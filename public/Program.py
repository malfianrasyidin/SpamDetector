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
print(data['algorithm'])

for tweet in data_twitter:
    temp = {}
    temp['username'] = '@'+tweet['user']['screen_name']
    temp['message'] = tweet['text']
    temp['created_at'] = TimeToString(ParseTimeFromStatus(tweet['created_at']))
    if(data['algorithm'] == 1):
        keywords = data['spam_keyword'].split(', ')
        flag = False
        new_text = temp['message']
        for keyword in keywords:
            flag2, new_text = matchBM(new_text, keyword)
            flag = flag or flag2
        temp['spam_flag'] = int(flag)
        temp['message'] = new_text
    elif(data['algorithm'] == 2):
        keywords = data['spam_keyword'].split(', ')
        flag = False
        new_text = temp['message']
        for keyword in keywords:
            flag2, new_text = matchKMP(new_text, keyword)
            flag = flag or flag2
        temp['spam_flag'] = int(flag)
        temp['message'] = new_text
        temp['spam_flag'] = int(flag)
        temp['message'] = new_text
    else:
        keywords = data['spam_keyword'].split(', ')
        flag = False
        new_text = temp['message']
        for keyword in keywords:
            flag2, new_text = matchRE(new_text, keyword)
            flag = flag or flag2
        temp['spam_flag'] = int(flag)
        temp['message'] = new_text
        temp['spam_flag'] = int(flag)
        temp['message'] = new_text
    result.append(temp)

with open('../storage/json/result.json', 'w') as outfile:
    json.dump(result, outfile)
