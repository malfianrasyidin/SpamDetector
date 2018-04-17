import sys
import json

# Membaca data yang dikirim dari PHP
data = (json.loads(sys.argv[1]))
# print(data)

# Membuat data yang akan dikirim ke PHP
result = {'status': 'Yes!'}
print (json.dumps(result))
