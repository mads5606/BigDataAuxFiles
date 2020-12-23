package processingT;


import org.apache.storm.topology.ConfigurableTopology;
import org.apache.storm.topology.TopologyBuilder;
import org.apache.storm.kafka.spout.KafkaSpout;
import org.apache.storm.kafka.spout.KafkaSpoutConfig;
import org.apache.storm.tuple.Fields;

public class TwitterTopology extends ConfigurableTopology {
    public static void main(String[] args) throws Exception {
        ConfigurableTopology.start(new TwitterTopology(), args);
    }

    @Override
    protected int run(String[] args) throws Exception {
    	String port = "9092";
    	
    	TopologyBuilder tp = new TopologyBuilder();
    	tp.setSpout("kafka_spout", new KafkaSpout<>(KafkaSpoutConfig.builder("10.123.252.217:" + port, "corona").build()), 1);
        tp.setBolt("countTweets", new CountBoltTweets(), 6).shuffleGrouping("kafka_spout");
        tp.setBolt("countTweets", new CountBoltLocation(), 12).fieldsGrouping("kafka_spout", new Fields("word"));

        String topologyName = "corona";

        conf.setNumWorkers(3);

        if (args != null && args.length > 0) {
            topologyName = args[0];
        }
        return submit(topologyName,conf,tp);
    }
}