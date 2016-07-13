#include<stdio.h>
#include<cs50.h>
#include<string.h>
void printInitials(string name);
int main(void)
{
    string name=GetString();
    printInitials(name);
    printf("\n");
}
void printInitials(string name)
{
    int i, j=0;
    char initials[50], c;
    for(i=0; i<strlen(name); i++)
    {
        if(i==0)
        {
            c=name[i];
            c=toupper(c);
            initials[j]=c;
            j++;
        }
        else if(name[i-1]==' ')
        {
            c=name[i];
            c=toupper(c);
            initials[j]=c;
            j++;
        }
    }
    puts(initials);
}
