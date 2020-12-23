package org.team.twitter.custom_twitter_interceptor;

import java.util.ArrayList;
import java.util.List;

import org.apache.flume.Context;
import org.apache.flume.Event;
import org.apache.flume.interceptor.Interceptor;
import org.apache.log4j.Logger;
import org.json.JSONException;
import org.json.JSONObject;

public class TwitterInterceptor implements Interceptor {
	
	final static Logger logger = Logger.getLogger(TwitterInterceptor.class);

	public static class Builder implements Interceptor.Builder {

		public void configure(Context ctx) { }

		
		public Interceptor build() {
			return new TwitterInterceptor();
		}
		
	}

	
	public void initialize() { }

	
	public Event intercept(Event event) {
		
		String eventBody = new String(event.getBody());
		
		try {
			logger.info("######### TRY START #######");
			JSONObject tweetJson = new JSONObject(new String(eventBody));
			
			String tweet_lang = tweetJson.getString("lang");
			logger.info("######### LANG #######");
			logger.info(tweet_lang);
			//filter out those tweets that are not written in English
			if(!tweet_lang.equals("en")){
				logger.info("\n****Not written in English: " + tweet_lang + "\n");
				return null;
			}
			
			logger.info("\n----Tweet Passes: " + tweetJson.getString("text") + "\n");
			
		} catch (JSONException e) {
			logger.error("Error parsing EventBody to JSON. ", e);
		}

		return event;
	}


	public List<Event> intercept(List<Event> events) {
		List<Event> result = new ArrayList<Event>();
		
		for(Event event: events){
			Event intercepted = intercept(event);
			result.add(intercepted);
		}

		return result;
	}
	

	public void close() { }

}