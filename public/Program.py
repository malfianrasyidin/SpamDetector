import sys
import time
import json
from Algo import *

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

with open('../storage/json/result.json', 'w') as outfile:
    json.dump(result, outfile)
