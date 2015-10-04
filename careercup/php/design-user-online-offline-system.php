

http://www.careercup.com/question?id=15421954


1) use distrubted memcache to store userId
2) set a timeout for key when user comes online to X min
3) browser will send keep alive for online users based on activity every X/2 min
4) on window close, remove the memcache key