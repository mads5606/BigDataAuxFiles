package org.team.storm.processing;


import java.util.Date;
import org.json.*;
import java.util.HashMap;
import java.util.Map;
import org.apache.storm.topology.BasicOutputCollector;
import org.apache.storm.topology.OutputFieldsDeclarer;
import org.apache.storm.topology.base.BaseBasicBolt;
import org.apache.storm.tuple.Fields;
import org.apache.storm.tuple.Tuple;
import org.apache.storm.tuple.Values;


import java.io.BufferedWriter;
import java.io.FileWriter;  // Import the File class
import java.io.IOException;  // Import the IOException class to handle errors

import java.net.URLEncoder;
import com.mashape.unirest.http.HttpResponse;
import com.mashape.unirest.http.JsonNode;
import com.mashape.unirest.http.Unirest;
import com.mashape.unirest.http.exceptions.UnirestException;

public class SplitTweet extends BaseBasicBolt {
    Map<String, Integer> counts = new HashMap<String, Integer>();

    @Override
    public void execute(Tuple tuple, BasicOutputCollector collector) {
        String word = tuple.getString(0);
        JSONObject jo = new JSONObject(word);
        
        String tweetContent = jo.getString("Text");
        String response = "";
		try {
			response = (String) Unirest.post("https://sentim-api.herokuapp.com/api/v1/").header("accept", "application/json").body("tweetContent").getBody();
		} catch (Exception e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
        
		Integer count = counts.get(response);
        if (count == null) {
            count = 0;
        }
        count++;
        counts.put(response, count);
        collector.emit(new Values(response, count));
    }

    @Override
    public void declareOutputFields(OutputFieldsDeclarer declarer) {
        declarer.declare(new Fields("word", "count"));
    }
}
