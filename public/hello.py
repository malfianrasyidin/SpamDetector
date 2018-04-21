import json
from Algo import *
import sys
import time
import tweepy
from tweepy import OAuthHandler

def ParseTimeFromStatus(timestr):
    return time.strptime(timestr, "%a %b %d %H:%M:%S +0000 %Y")

def ParseTimeFromForm(timestr):
    return time.strptime(timestr, "%Y-%m-%dT%H:%M:%S")

def CompareTime(time1, time2):
    if(time.mktime(time1) > time.mktime(time2)):
        return 1
    elif(time.mktime(time1) < time.mktime(time2)):
        return -1
    else:
        return 0

def TimeToString(t):
    return time.strftime("%Y-%m-%d %H:%M:%S", t)

data = json.loads(sys.argv[1])
data_twitter = json.loads(sys.argv[2])

with open('../storage/data.json') as f:
    data = json.load(f)
    f.close()

with open('../storage/data_twitter.json') as f:
    data_twitter = json.load(f)
    f.close()


# print(json.dumps(data))
# print(sys.argv[2])

# inrange_tweet = []
# start_datetime = ParseTimeFromForm(data['start_datetime'])
# end_datetime = ParseTimeFromForm(data['end_datetime'])
# for tweet in tweet_list:
#     tweet_time = ParseTimeFromStatus(tweet['created_at'])
#     if(CompareTime(start_datetime, tweet_time) <= 0 and CompareTime(end_datetime, tweet_time >= 0)):
#         inrange_tweet.append(tweet)

# sebagai contoh
result = [
    {
        'username' : "@malfian_rasyid",
        'message':"Bukan SPAM sih yang ini", 
        'created_at':TimeToString(time.gmtime()),
        'spam_flag':0, 
    },
    {
        'username' : "@agung",
        'message':"Ini Spam", 
        'created_at':TimeToString(time.gmtime()),
        'spam_flag':1,  
    }
]

for tweet in data_twitter:
    temp = {}
    temp['username'] = tweet['user']['name']
    temp['message'] = tweet['text']
    temp['created_at'] = TimeToString(ParseTimeFromStatus(tweet['created_at']))
    if(data['algorithm'] == 1):
        temp['spam_flag'] == int(matchBM(temp['message'], data['spam_keyword']))
    elif(data['algorithm'] == 2):
        temp['spam_flag'] == int(matchKMP(temp['message'], data['spam_keyword']))
    else:
        temp['spam_flag'] == int(matchRE(temp['message'], data['spam_keyword']))
    result.append(temp)

# print(sys.argv[1])
# print(sys.argv[2])

# Membuat data yang akan dikirim ke PHP
# result = {'status': 'Yes!'}
# print (json.dump(result))

with open('../storage/result.json', 'w') as outfile:
    json.dump(result, outfile)
