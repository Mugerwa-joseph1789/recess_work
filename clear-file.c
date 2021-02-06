#include <stdio.h>
#include <stdlib.h>
#include <string.h>

void main(){
    FILE *ptr;
    ptr = fopen("patient_file.txt","w+");
    if (ptr == NULL) {
        /* code */
        perror("Error file:");
        exit(1);
    }else
    {
        puts("file cleared.");
    }
    

    fclose(ptr);
    
}