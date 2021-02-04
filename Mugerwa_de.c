#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
//#include <netdb.h>
//#include <netinet/in.h>
#include <string.h>
#define Maximum_patients 100
int no_of_patients = 0;
//file
FILE *sick_file;

//structure
typedef struct Patients
{
    char patient_name[50];
    char patient_gender[50];
    char DOI[100];
    char status[100];
} patient;
//officer name
char officer_name[50];
char district_name[30];

//socket globals
int sockfd, portno, n;
struct sockaddr_in serv_addr;
struct hostent *server;
char buffer[256];
portno = 3007;

//create global structure
patient patients[Maximum_patients];


int display_commands()
{
    
    char operation[5][30] =
        {"1:ADD_PATIENT", "2:ADD_PATIENT_LIST",
         "3:CHECK_STATUS", "4:ADD_PATIENT_FILE.TXT", "5:SEARCH_CRITERIA"};
    int next_operation;
    puts("============Lists of Operations=========\t");
    for (next_operation = 0; next_operation < 5; next_operation++)
    {
        puts(operation[next_operation]);
    }
    int current_operation;
    printf("\nSelectOperation:");
    scanf("%d",  current_operation);
    return current_operation;
}
//patient functions
void add_patient()
{
    //struct
    //set up some condition to stop

    printf("OfficerName:");
    scanf("%s", officer_name);
    char stop;
    int loop;
    puts("\t\n******** ENTER_PATIENT_INFORMATION ******\n");
    for (loop = no_of_patients; loop <= Maximum_patients; loop++)
    {
        puts("PatientName");
        scanf("%s", patients[loop].patient_name);
        puts("PatientGender [F or M]");
        scanf("%s", patients[loop].patient_gender);
        puts("Date:e.g 01/25/2021 or 01-25-2021");
        scanf("%s", patients[loop].DOI);
        puts("Asymptomatic/NotAsymptomatic");
        scanf("%s", patients[loop].status);
        no_of_patients += 1;
        puts("More patients y/n?");
        scanf(" %c", &stop);
        if (stop == 'n' || stop == 'N')
        {
            break;
        }
        puts("\n ********NEXT_PATIENT********\n");
    }
}
//patient_list
void add_patient_list()
{
    if (no_of_patients == 0)
    {
        printf("\nAlert !! no patients yet !!\n");
        get_operation(display_commands());
    }
    else
    {
        sick_file = fopen("sick_file.txt", "a+");
        //loop
        if (sick_file == NULL)
        {
            printf("\nFile not found We are sorry\n");
        }
        else
        {
            //loop
            int i;
            for (i = 0; i < no_of_patients; i++)
            {
                fprintf(sick_file, "%s\t\t%s\t%s\t%s\n", patients[i].patient_name, patients[i].DOI, patients[i].patient_gender, officer_name);
            }
            printf("\n****** All Patients Added ******\n");
            no_of_patients = 0;
            fclose(sick_file);
        }
    }
}

void check_status()
{
    sick_file = fopen("sick_file.txt", "r");
    if (sick_file == NULL)
    {
        puts("\nFiles does not exit\n");
        get_operation(display_commands());
    }
    else
    {
        char store[200];
        int number_of_sick = 0;
        while (fgets(store, 100, sick_file) != NULL)
        {
            number_of_sick++;
        }
        number_of_sick == 1 ? printf("\nThere is %d case stored in the file", number_of_sick)
                          : printf("\nThere are %d cases stored in the file\n", number_of_sick);
    }
}
void search_details()
{
    //date/name
    sick_file = fopen("sick_file.txt", "r");
    char search_name[50];
    printf("Search by name or date(01/01/2021):");
    scanf("%s", search_name);
    char store[200];

    int available_records = 0;
    int total_records = 0;
    puts("\n****************************************");
    puts("PatientName\t\tDate\t\tGender\t\tOfficerName");
    puts("-------------------------------------------");
    while (fgets(store, 100, sick_file) != NULL)
    {
        total_records++;
        if (strstr(store, search_name) != NULL)
        {
            puts(store);
            available_records++;
        }
    }

    if (available_records == 0)
        printf("\nNo RECORDS available\n");
    else
    {
        int i = 0;
        for (i = 0; i <= total_records; i++)
        {
            if (available_records == i)
            {
                int get_records = available_records;
                get_records == 1 ? printf("\n%d record available out of %d\n", get_records, total_records)
                                   : printf("\n%d available_records available out of %d\n", get_records, total_records);
            }
        }
    }
    printf("\n");
}
void send_patient_file()
{
    sick_file = fopen("sick_file.text", "r");
    if (sick_file == NULL)
    {
        printf("\nFile does not exist");
    }
    // create socket and get file descriptor
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
    serv_addr.sin_port = htons(portno);
    //connect to server with server address which is set above (serv_addr)

    if (connect(sockfd, (struct sockaddr *)&serv_addr, sizeof(serv_addr)) < 0)
    {
        perror("ERROR while connecting");
        exit(1);
    }

    //implement connections
    while (1)
    {
        printf("What do you want to say? ");
        //making sure variable buffer is initiallized to zero.
        bzero(buffer, 256);

        //Input that goes to the server is obtained and stored in buffer.
        //scanf("%s", buffer);
        fgets(buffer, 255, sick_file);
        //gets(buffer);
        n = write(sockfd, buffer, strlen(buffer));

        if (n < 0)
        {
            perror("ERROR while writing to socket");
            exit(1);
        }

        bzero(buffer, 256);
        n = read(sockfd, buffer, 255);

        if (n < 0)
        {
            perror("ERROR while reading from socket");
            exit(1);
        }
        printf("server replied: %s \n", buffer);

        // escape this loop, if the server sends message "quit"

        if (!bcmp(buffer, "quit", 4))
            break;
    }
}
//patients functions
//returns a commad
int get_operation(int current_operation)
{
    if  current_operation == 1)
    {
        //f
        add_patient();
        printf("\n");
        return 0;
    }
    else if  current_operation == 2)
    {
        add_patient_list();
        printf("\n");
        return 0;
    }
    else if  current_operation == 3)
    {
        check_status();
        printf("\n");
        return 0;
    }
    else if  current_operation == 4)
    {
        //add file
        //connect
        send_patient_file();
        return 0;
    }
    else if  current_operation == 5)
    {
        search_details();
        printf("\n");
    }
    else
    {
        //printf
        //display_commands();
        puts("\nInvalid Command!! Enter  valid Command:\n");
        get_operation(display_commands());
    }
    return 0;
}
int main(int argc, char *argv[])
{
    puts("-------------------------Welcome to the covid-19 case management and reporting system-------------------");
    //fopen("sick_file.txt", "a+");
    printf("Enter district name (e.g) Kampala: ");

    scanf("%s", district_name);
    while (1)
    {
        get_operation(display_commands());
        continue;
    }

    char username[100], password[100];
    // //Prompt user to enter district
    // puts("   Welcome to our covid system   ");
    // puts("  Please enter username ");
    // gets(username);
    // puts("Enter password now!");
    // gets(password);

    // create socket and get file descriptor
    sockfd = socket(AF_INET, SOCK_STREAM, 0);

    server = gethostbyname("127.0.0.1");

    // if (server == NULL) {
    //     fprintf(stderr,"ERROR, no such host\n");
    //     exit(0);
    // }

    // bzero((char *) &serv_addr, sizeof(serv_addr));
    // serv_addr.sin_family = AF_INET;
    // bcopy((char *)server->h_addr, (char *)&serv_addr.sin_addr.s_addr, server->h_length);
    // serv_addr.sin_port = htons(portno);

    // connect to server with server address which is set above (serv_addr)

    // if (connect(sockfd, (struct sockaddr *)&serv_addr, sizeof(serv_addr)) < 0) {
    //     perror("ERROR while connecting");
    //     exit(1);
    // }
    // FILE *fileHd = fopen("patients.txt","r");
    // // inside this while loop, implement communicating with read/write or send/recv function
    // while (1) {
    //     printf("What do you want to say? ");
    //     //making sure variable buffer is initiallized to zero.
    //     bzero(buffer,256);

    //     //Input that goes to the server is obtained and stored in buffer.
    //     //scanf("%s", buffer);
    //     fgets(buffer,255,fileHd);
    // 	//gets(buffer);
    //     n = write(sockfd,buffer,strlen(buffer));

    //     if (n < 0){
    //        
     perror("ERROR while writing to socket");
    //         exit(1);
    //     }

    //     bzero(buffer,256);
    //     n = read(sockfd, buffer, 255);

    //     if (n < 0){
    //         perror("ERROR while reading from socket");
    //         exit(1);
    //     }
    //     printf("server replied: %s \n", buffer);

    //     // escape this loop, if the server sends message "quit"

    //     if (!bcmp(buffer, "quit", 4))
    //         break;
    // }
    return 0;
}
