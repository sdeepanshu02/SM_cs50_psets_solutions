/**
 * helpers.c
 *
 * Computer Science 50
 * Problem Set 3
 *
 * Helper functions for Problem Set 3.
 */

#include <cs50.h>
#include <stdio.h>

#include "helpers.h"

/**
 * Returns true if value is in array of n values, else false.
 */
bool search(int value, int values[], int n)
{
    // TODO: implement a searching algorithm
    if(value<0)
        return false;
    else
    {
        int a=0,b=n-1,mid;
        while(a<=b)
        {
            mid=(a+b)/2;
            if(values[mid]==value)
            {
                return true;
            }
            else if(values[mid]<value)
            {
                a=mid+1;
            }
            else if(values[mid]>value)
            {
                b=mid-1;
            }
        }
        return false;
    }
}

/**
 * Sorts array of n values.
 */
void sort(int values[], int n)
{
    // TODO: implement an O(n^2) sorting algorithm
    for(int i=0;i<n-1;i++)
    {
        for(int j=0;j<n-1-i;j++)
        {
            if(values[j]>values[j+1])
            {
                int temp=values[j];
                values[j]=values[j+1];
                values[j+1]=temp;
            }
        }
    }
    return;
}
