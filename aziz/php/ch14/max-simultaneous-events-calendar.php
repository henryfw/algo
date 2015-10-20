<?php

function findMaxEvents($inputs) {

}



/*
 * public static int findMaxSimultaneousEvents(Event[] A) {
    // Builds an array of all endpoints.
    List<Endpoint> E = new ArrayList<>();
    for (Event event : A) {
      E.add(new Endpoint(event.start, true));
      E.add(new Endpoint(event.finish, false));
    }
    // Sorts the endpoint array according to the time, breaking ties
    // by putting start times before end times.
    Collections.sort(E);

    // Track the number of simultaneous events, and record the maximum
    // number of simultaneous events.
    int maxNumSimultaneousEvents = 0, numSimultaneousEvents = 0;
    for (Endpoint endpoint : E) {
      if (endpoint.isStart) {
        ++numSimultaneousEvents;
        maxNumSimultaneousEvents =
            Math.max(numSimultaneousEvents, maxNumSimultaneousEvents);
      } else {
        --numSimultaneousEvents;
      }
    }
    return maxNumSimultaneousEvents;
  }

 */