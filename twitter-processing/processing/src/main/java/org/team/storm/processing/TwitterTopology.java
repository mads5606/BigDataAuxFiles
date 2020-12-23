package org.team.storm.processing;

import java.util.Map;
import org.apache.storm.task.ShellBolt;
import org.apache.storm.topology.BasicOutputCollector;
import org.apache.storm.topology.ConfigurableTopology;
import org.apache.storm.topology.IRichBolt;
import org.apache.storm.topology.OutputFieldsDeclarer;
import org.apache.storm.topology.TopologyBuilder;
import org.apache.storm.topology.base.BaseBasicBolt;
import org.apache.storm.kafka.spout.KafkaSpout;
import org.apache.storm.kafka.spout.KafkaSpoutConfig;
import org.apache.storm.tuple.Fields;
import org.apache.storm.tuple.Tuple;
import org.apache.storm.tuple.Values;
import java.util.Date;  

/**
 * This topology demonstrates Storm's stream groupings and multilang
 * capabilities.
 */
public class TwitterTopology extends ConfigurableTopology {
    public static void main(String[] args) throws Exception {
        ConfigurableTopology.start(new TwitterTopology(), args);
    }

    @Override
    protected int run(String[] args) throws Exception {
    	String port = "";
    	
    	TopologyBuilder tp = new TopologyBuilder();
    	tp.setSpout("kafka_spout", new KafkaSpout<>(KafkaSpoutConfig.builder("127.0.0.1:" + port, "topic").build()), 1);
        tp.setBolt("countTweets", new CountBoltTweets(), 12).fieldsGrouping("kafka_spout", new Fields("word"));
        //tp.setBolt("countTweets", new CountBoltLocation(), 12).fieldsGrouping("kafka_spout", new Fields("word"));
        conf.setDebug(true);

        String topologyName = "word-count";

        conf.setNumWorkers(3);

        if (args != null && args.length > 0) {
            topologyName = args[0];
        }
        return submit(topologyName,conf,tp);
    }
}