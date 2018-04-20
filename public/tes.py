import time

def ParseTime(timestr):
    return time.strptime(timestr, "%a %b %d %H:%M:%S +0000 %Y")

def CompareTime(time1, time2):
    if(time.mktime(time1) > time.mktime(time2)):
        return 1
    elif(time.mktime(time1) < time.mktime(time2)):
        return -1
    else:
        return 0


print(CompareTime(ParseTime("Thu May 20 10:11:29 +0000 2018"), ParseTime("Fri Apr 20 10:11:29 +0000 2018")))