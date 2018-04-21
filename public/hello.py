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

# data = json.loads(sys.argv[1])

# consumer_key = data['consumer_key']
# consumer_secret = data['consumer_secret']
# access_token = data['access_token']
# access_secret = data['access_secret']

consumer_key = 'VUhzcVvIMflwCnfgFeNYzCSGP'
consumer_secret = 'q2sxPfV9wJJ15MKZpSv5PcYICNW5BTy2ihyhzUP6e2QqQevLII'
access_token = '2568111140-UWMZnmO2mDKr8SlUsAfWmb3Vgs7IJG6GNZyY7QW'
access_secret = 'cNSR4cWQeTpmiBO2o4gQ8lyg9JIyaNtgsSpSILpHXEYcu'

auth = OAuthHandler(consumer_key, consumer_secret)
auth.set_access_token(access_token, access_secret)
api = tweepy.API(auth)

data = {
    'spam_keyword':'bacot',
    'algorithm':1,
    'start_datetime' : TimeToString(time.gmtime()),
    'end_datetime' : TimeToString(time.gmtime())
}

tweet_list = list(tweepy.Cursor(api.home_timeline).items())
print(tweet_list)

# inrange_tweet = []
# start_datetime = ParseTimeFromForm(data['start_datetime'])
# end_datetime = ParseTimeFromForm(data['end_datetime'])
# for tweet in tweet_list:
#     tweet_time = ParseTimeFromStatus(tweet['created_at'])
#     if(CompareTime(start_datetime, tweet_time) <= 0 and CompareTime(end_datetime, tweet_time >= 0)):
#         inrange_tweet.append(tweet)

# # sebagai contoh
# result = [
#     {
#         'username' : "@malfian_rasyid",
#         'message':"Bukan SPAM sih yang ini", 
#         'created_at':TimeToString(time.gmtime()),
#         'spam_flag':0, 
#     },
#     {
#         'username' : "@agung",
#         'message':"Ini Spam", 
#         'created_at':TimeToString(time.gmtime()),
#         'spam_flag':1,  
#     }
# ]

# for tweet in inrange_tweet:
#     temp = {}
#     temp['username'] = tweet['user']['name']
#     temp['message'] = tweet['text']
#     temp['created_at'] = TimeToString(ParseTimeFromStatus(tweet['created_at']))
#     if(data['algorithm'] == 1):
#         temp['spam_flag'] == int(matchBM(temp['message'], data['spam_keyword']))
#     elif(data['algorithm'] == 2):
#         temp['spam_flag'] == int(matchKMP(temp['message'], data['spam_keyword']))
#     else:
#         temp['spam_flag'] == int(matchRE(temp['message'], data['spam_keyword']))
#     result.append(temp)
# print(json.dumps(result))


# print(data['start_datetime'])

# import sys
# import json
# import tweepy
# from tweepy import OAuthHandler

# # Membaca data yang dikirim dari PHP
# # data = (json.loads(sys.argv[1]))

# consumer_key = '5p9RJNvDY6g7X7iqQvzuGVcHv'
# consumer_secret = 'FWn4OZIbtJjs6qEErvX9R0fYX0FN84XP72eMjO2zdJUODBxtxK'
# access_token = '197745421-LgYMwS7PtHSSxLFATSlceRsdpMaCA9qf1dtz5t9v'
# access_secret = 'huq48ZjymfCQZcudTyq0zGeHehloz8jgmHFWhg4lQcMiv'

# api = Twitter(
#     auth=OAuth(
#         access_token,
#         access_secret,
#         consumer_key,
#         consumer_secret
#     )
# )
# x = api.statuses.home_timeline()
# print([123123,123,123,123])
# print('testes2123123')
# print(x[0]['text'])


# Membuat data yang akan dikirim ke PHP
# result = {'status': 'Yes!'}
# print (json.dump(result))
