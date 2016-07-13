#include<stdio.h>
#include<cs50.h>
#include<math.h>
int main(void){
    int amount, coins=0;
    do
    {
        printf("O hai! How much change is owed?\n");
        change = GetFloat();
        amount = round(change * 100);
    }
    while (change <= 0);
    while(amount>0)
    {
        if(amount>=25)
        {
            coins++;
            amount-=25;
        }
        else if(amount>=10)
        {
            coins++;
            amount-=10;
        }
        else if(amount>=5)
        {
            coins++;
            amount-=5;
        }
        else if(amount>=1)
        {
            coins++;
            amount-=1;
        }
    }
    printf("%i\n",coins);
}
