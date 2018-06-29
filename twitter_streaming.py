 from tweepy.streaming import StreamListener
 from tweepy import OAuthHandler
 from tweepy import Stream

mport MysqlDemo
 #Variables that contains the user credentials to access Twitter API 
 access_token = "1011595256528359424-v0MzJtnZYeWUrmaJcbD0KQ32Jb2xMi"
 access_token_secret = "MzUOK8Pg5RLYebBOrY6pQxSwNZmhC6Msukd4kfaXigPFH"
@@ -18,10 +18,11 @@ class StdOutListener(StreamListener):
 
     def on_data(self, data):
         tweet = json.loads(data)
         print ((tweet['user']['name']).encode("utf-8"))
         print ((tweet['text']).encode("utf-8"))
         print ((tweet['created_at']).encode("utf-8"))       
	 name = (tweet['user']['name']).encode("utf-8")        
	text = (tweet['text']).encode("utf-8")
       	createdTime = (tweet['created_at']).encode("utf-8")
         #print (data)
       	MysqlDemo.mysqlInsert(name, text, createdTime)
         return True
 
     def on_error(self, status):