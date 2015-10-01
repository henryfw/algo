<?php

// http://www.careercup.com/question?id=14688762


/*
 * Using multiple search servers, each with a memcache key of total count. If searches are sync logged, used PK.
 *
 * Have 1 master controller.
 *
 * Every 60 seconds, master aggregates total and sends total to search servers. Variable: estimatedLeft or PKtoWin
 *
 * This may include a "velocity" factor, last60SecondTotal / numServers.
 *
 * When a local server hit estimatedLeft == 0, send message to master.
 *
 * Master will decide if it is the first winner using atomic memcache flag: winnerFound. Then ignore all other winner signals.
 *
 * Master sends notification to user. Also send email to admin and user.
 *
 * Search page is subscribed to notification for this message.
 */