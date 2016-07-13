#include <cs50.h>
#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <ctype.h>
int main(int argc, string argv[])
{
    if(argc!=2)
    {
        printf("Enter one Key\n");
        return 1;
    }
    else
    {
        int k=atoi(argv[1]);
        string text = GetString();
        for(int i=0,n=strlen(text); i<n; i++)
        {
            char letter=text[i];
            int ciphertext;
            if(isupper(letter))
            {
                ciphertext=(letter-65+key)%26+65;
            }
            else if(islower(letter))
            {
                ciphertext=(letter-97+key)%26+97;
            }
            else
            {
                ciphertext=letter;
            }
            printf("%c",ciphertext);
        }
        printf("\n");
    }
}
