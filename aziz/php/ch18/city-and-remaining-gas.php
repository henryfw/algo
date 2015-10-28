<?php

// find the city that if arriving into it, has the least amount of gas
// this means you start with the most amount of gas


/*
 * // @include
  private static class CityAndRemainingGas {
    public Integer city;
    public Integer remainingGas;

    public CityAndRemainingGas(Integer city, Integer remainingGas) {
      this.city = city;
      this.remainingGas = remainingGas;
    }
  }

  static int findStartCity(List<Integer> G, List<Integer> D) {
    int carry = 0;
    CityAndRemainingGas min = new CityAndRemainingGas(0, 0);
    for (int i = 1; i < G.size(); ++i) {
      carry += G.get(i - 1) - D.get(i - 1);
      if (carry < min.remainingGas) {
        min = new CityAndRemainingGas(i, carry);
      }
    }
    return min.city;
  }
  // @exclude

 */