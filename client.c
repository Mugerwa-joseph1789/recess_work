#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <netdb.h>
#include <netinet/in.h>
#include <string.h>
#define MAX_PATIENTS 100

FILE *sick_file;



//socket globals
int sockfd, n;
struct sockaddr_in serv_addr;
struct hostent *server;
char buffer[256];
socklen_t portno = 5000;
char district_name[30];




void display_commands(){
    
    char choice[5][30] = {"1:ADD_YOUR_PATIENT", "2:ADD_MULTIPLE_CASES","3:CHECK_CURRENT_FILE_STATUS", "4:SEARCH_CRITERIA"};
    int next_choice;
    puts("");
    puts("");
    puts("Choose a number that fits your command");
    puts("");
    puts("-------Lists of Choices-----\t");
    for (next_choice = 0; next_choice < 5; next_choice++)
    {
        puts(choice[next_choice]);
    }
};
char *get_command(int selected_choice)
// call functions
{
    if (selected_choice == 1){
        return "1";
    }
    else if (selected_choice == 2){
        return "2";
    }
    else if (selected_choice == 3){
        printf("\n");
        return "3";
    }
    else if (selected_choice == 4){
        return "4";
    } else{
      return "5";
    }
}
int main(int argc, char *argv[]){
    int Choose;
    int len=70;
    char *district[71]={"Kalangala", "Kampala", "Kayunga", "Kiboga", "Luwero", "Masaka", "Mityana", "Mpigi", 
    "Mubende", "Mukono", "Nakaseke", "Nakasongola", "Rakai", "Sembabule", "Wakiso", "Amuria", "Budaka", "Bugiri", "Bukwa",
     "Busia", "Butaleja", "Iganga", "Jinja", "Kaberamaido", "Kaliro", "Kamuli", "Kapchorwa", "Katakwi", "Kumi", "Manafwa", "Mayuge", "Mbale", "Pallisa", "Sironko", "Soroti", "Tororo",
    "Amolatar", "Adjumani", "Apac", "Arua", "Gulu", "Kaabong", "Kitgum", "Koboko", "Kotido", "Lira" ,"Moroto", "Moyo", 
    "Nakapiripirit", "Nebbi", "Pader", "Yumbe", "Bundibugyo", "Bushenyi", "Hoima", "Ibanda", "Kabale", "Kabarole", "Kamwenge", "Kanungu", "Kasese", 
    "Kibaale", "Kabingo", "Kiruhura", "Kisoro", "Kyenjojo", "Masindi", "Mbarara", "Ntungamo","Karamoja", "Rukungiri"};
    if (argc != 2){
        printf("\nUsage:%s <ip server>\n",argv[2]);
    }
    
      sockfd = socket(AF_INET, SOCK_STREAM, 0);

    server = gethostbyname("127.0.0.1");

    if (server == NULL)
    {
        fprintf(stderr, "ERROR, no such host\n");
        exit(0);
    }

    bzero((char *)&serv_addr, sizeof(serv_addr));
    serv_addr.sin_family = AF_INET;
    bcopy((char *)server->h_addr, (char *)&serv_addr.sin_addr.s_addr, server->h_length);
    serv_addr.sin_port = htons(5000);
    //connect to server with server address which is set above (serv_addr)

    if (connect(sockfd, (struct sockaddr *)&serv_addr, sizeof(serv_addr)) < 0) {
        perror("ERROR while connecting");
        exit(1);
    }

    puts("-------------------------Welcome to the covid-19 case management and reporting system-------------------");
    puts("\n");


    int j=0,p=0;
    while(1){
    printf("Enter name of district forexample Kampala: ");
    puts("Start with a capital letter.");
    scanf("%s", district_name);
    for(j=0;j<sizeof district;j++){
        if(strcmp(district_name,district[j])==0){
            p=p+1;
            break;
        }
        else{
            continue;
        }

    }
    if(p==1){
        break;
    }
    }
      while (1){
          display_commands();
          
         printf("\nSelectCommand:");
        scanf("%d", &Choose);
       snprintf(buffer,sizeof(buffer),"%s",get_command(Choose));
      
        n = write(sockfd, buffer, 256);

        if (n < 0){
            perror("ERROR while writing to socket");
            exit(1);
        }

        bzero(buffer, 256);
        int rnd = read(sockfd, buffer, 256);

        if (rnd < 0) {
            perror("ERROR while reading from socket");
            exit(1);
        }
        printf("\n\nServer replied: %s \n\n", buffer);

        
    }
}
   
