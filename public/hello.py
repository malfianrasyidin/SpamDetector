import sys
import json
from twitter import *

# Membaca data yang dikirim dari PHP
# data = (json.loads(sys.argv[1]))

consumer_key = '5p9RJNvDY6g7X7iqQvzuGVcHv'
consumer_secret = 'FWn4OZIbtJjs6qEErvX9R0fYX0FN84XP72eMjO2zdJUODBxtxK'
access_token = '197745421-LgYMwS7PtHSSxLFATSlceRsdpMaCA9qf1dtz5t9v'
access_secret = 'huq48ZjymfCQZcudTyq0zGeHehloz8jgmHFWhg4lQcMiv'

api = Twitter(
    auth=OAuth(
        access_token,
        access_secret,
        consumer_key,
        consumer_secret
    )
)
x = api.statuses.home_timeline()
print([123123,123,123,123])
print('testes2123123')
print(x[0]['text'])


# Membuat data yang akan dikirim ke PHP
# result = {'status': 'Yes!'}
# print (json.dump(result))
