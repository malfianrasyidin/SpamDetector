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
        flag, new_text = matchBM(temp['message'], data['spam_keyword'])
        temp['spam_flag'] = int(flag)
        temp['message'] = new_text
    elif(data['algorithm'] == 2):
        flag, new_text = matchBM(temp['message'], data['spam_keyword'])
        temp['spam_flag'] = int(flag)
        temp['message'] = new_text
    else:
        flag, new_text = matchBM(temp['message'], data['spam_keyword'])
        temp['spam_flag'] = int(flag)
        temp['message'] = new_text
    result.append(temp)

with open('../storage/json/result.json', 'w') as outfile:
    json.dump(result, outfile)
