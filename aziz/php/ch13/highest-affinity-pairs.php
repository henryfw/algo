<?php

function highestAffinityPair($lines) {
    $pages = [];
    foreach($lines AS $line) {
        list($page, $user) = explode(",", $line);

        if (!isset($pages[$page])) $pages[$page] = [];
        $pages[$page][$user] = true;
    }

    $result = null;
    $maxCount = 0;

    $pageKeys = array_keys($pages);

    for($i = 0; $i < count($pageKeys); $i ++ ){
        for($j = $i + 1; $j < count($pageKeys); $j ++ ){
            $intersectUsers = array_intersect( array_keys($pages[$pageKeys[$i]]), array_keys($pages[$pageKeys[$j]]) );
            if (count($intersectUsers) > $maxCount) {
                $maxCount = count($intersectUsers);
                $result = [$pageKeys[$i], $pageKeys[$j], $maxCount, $intersectUsers];
            }
        }
    }

    return $result;
}

print_r(highestAffinityPair(["abc,1", "def,1", "xxx,1", "abc,2", "abc,3", "def,2", "xxx,3"]));

/*
 *
  private static class PagePair {
    public String pageA;
    public String pageB;

    public PagePair(String pageA, String pageB) {
      this.pageA = pageA;
      this.pageB = pageB;
    }
  }

  public static PagePair highestAffinityPair(ObjectInputStream ois) {
    // Creates a mapping from pages to distinct users.
    Map<String, Set<String>> pageUsersMap = new HashMap<>();
    try {
      while (true) {
        String page = (String) ois.readObject();
        String user = (String) ois.readObject();
        System.out.println("page, user = " +  page + " " + user);
        Set<String> users = pageUsersMap.get(page);
        if (users == null) {
          users = new HashSet<>();
        }
        users.add(user);
        pageUsersMap.put(page, users);
      }
    } catch (IOException e) {
    } catch (ClassNotFoundException e) {
    }

    PagePair result = null;
    int maxCount = 0;
    // Compares all pairs of pages to users maps.
    List<String> keys = new ArrayList<>(pageUsersMap.keySet());
    for (int i = 0; i < keys.size(); i++) {
      for (int j = i + 1; j < keys.size(); ++j) {
        Set<String> intersectUsers = new HashSet<>(pageUsersMap.get(keys.get(i)));
        intersectUsers.retainAll(pageUsersMap.get(keys.get(j)));

        // Updates result if we find larger intersection.
        if (intersectUsers.size() > maxCount) {
          maxCount = intersectUsers.size();
          result = new PagePair(keys.get(i), keys.get(j));
        }
      }
    }
    return result;
  }

 */