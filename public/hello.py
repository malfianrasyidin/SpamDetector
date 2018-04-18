import json
import tweepy
from tweepy import OAuthHandler

consumer_key = '5p9RJNvDY6g7X7iqQvzuGVcHv'
consumer_secret = 'FWn4OZIbtJjs6qEErvX9R0fYX0FN84XP72eMjO2zdJUODBxtxK'
access_token = '197745421-LgYMwS7PtHSSxLFATSlceRsdpMaCA9qf1dtz5t9v'
access_secret = 'huq48ZjymfCQZcudTyq0zGeHehloz8jgmHFWhg4lQcMiv'

auth = OAuthHandler(consumer_key, consumer_secret)
auth.set_access_token(access_token, access_secret)
api = tweepy.API(auth)

def process_or_store(tweet):
    print(json.dumps(tweet))

for status in tweepy.Cursor(api.home_timeline).items(10):
    # Process a single status
    # process_or_store(status._json)
    print(json.dumps(status._json))



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
