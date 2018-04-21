import json
from Algo import *
import sys
import time
import tweepy
from tweepy import OAuthHandler

def ParseTimeFromStatus(timestr):
    return time.strptime(timestr, "%a %b %d %H:%M:%S +0000 %Y")

def TimeToString(t):
    return time.strftime("%Y-%m-%d %H:%M:%S", t)

with open('../storage/json/data.json') as f:
    data = json.load(f)
    f.close()

with open('../storage/json/data_twitter.json') as f:
    data_twitter = json.load(f)
    f.close()

# print(data_twitter[0]['text'])

# print(json.dumps(data))
# print(sys.argv[2])

# inrange_tweet = []
# start_datetime = ParseTimeFromForm(data['start_datetime'])
# end_datetime = ParseTimeFromForm(data['end_datetime'])
# for tweet in tweet_list:
#     tweet_time = ParseTimeFromStatus(tweet['created_at'])
#     if(CompareTime(start_datetime, tweet_time) <= 0 and CompareTime(end_datetime, tweet_time >= 0)):
#         inrange_tweet.append(tweet)
result = []

for tweet in data_twitter:
    temp = {}
    temp['username'] = '@'+tweet['user']['screen_name']
    temp['message'] = tweet['text']
    temp['created_at'] = TimeToString(ParseTimeFromStatus(tweet['created_at']))
    if(data['algorithm'] == 1):
        temp['spam_flag'] = int(matchBM(temp['message'], data['spam_keyword']))
    elif(data['algorithm'] == 2):
        temp['spam_flag'] = int(matchKMP(temp['message'], data['spam_keyword']))
    else:
        temp['spam_flag'] = int(matchRE(temp['message'], data['spam_keyword']))
    result.append(temp)

# print(sys.argv[1])
# print(sys.argv[2])

# Membuat data yang akan dikirim ke PHP
# result = {'status': 'Yes!'}
print (json.dumps(result))

# print(result)

with open('../storage/json/result.json', 'w') as outfile:
    json.dump(result, outfile)
