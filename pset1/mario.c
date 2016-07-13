#include <cs50.h>
#include <stdio.h>
#include <string.h>

int main(void)
{
    int height;
    do
    {
        printf("Height: ");
        height = GetInt();
    }
    while (height>23||height<0);

    int i;
    for (i=0;i<height;i++)
    {
        int j;
        for (j=height-i-1;j>0;j--)
        {
            printf(" ");
        }
        int k;
        for (k=0;k<i+2;k++)
        {
            printf("#");
        }
        printf("\n");
    }
}
