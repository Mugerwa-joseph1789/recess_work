#include <mysql.h>
#include <stdlib.h>
#include <stdio.h>
#include <time.h>

struct patient{
    char patient_fname[50];
    char patient_sname[50];
    char patient_gender[50];
	char DOI[100];
    char status[100];
    char User_name[30];
};



int main(){
	MYSQL *conn = mysql_init(NULL);
	
	char sql[1024];
	FILE *file;
	float tc = clock();
	int flag = 0;

 struct patient details[100];

	if (conn == NULL){
		/* code */
		fprintf(stderr,"%s\n",mysql_error(conn));
		exit(1);
	}
	
	if (mysql_real_connect(conn,"127.0.0.1","root","","nationaldatabase",0,NULL,0) == NULL){
		fprintf(stderr,"%s\n",mysql_error(conn));
		exit(1);
	}

	 file = fopen("sick_file.txt","r");
    if(file == NULL){
        perror("Error in file:");
        exit(1);
    }
	else{
         while(!feof(file)){
               fscanf(file,"%s %s %s %s %s %s \n",details[flag].patient_fname,details[flag].patient_sname,details[flag].patient_gender,details[flag].DOI,details[flag].status,details[flag].User_name);
				sprintf(sql,"INSERT INTO `Covid_cases`( patient_fname,patient_sname,patient_gender,DOI,status,User_name)VALUES('%s','%s','%s','%s','%s','%s');",details[flag].patient_fname,details[flag].patient_sname,details[flag].patient_gender,details[flag].DOI,details[flag].status,details[flag].User_name);
                flag++;
        }; 
		
       // puts(details[2].patient_sname);
        fclose(file);
    }
	if (mysql_query(conn,sql)){
				fprintf(stderr,"%s\n",mysql_error(conn));
				exit(1);
			 }
		printf("The client id for mysql :%s  has inserted data successfully  in %f seconds\n",mysql_get_client_info(),tc/CLOCKS_PER_SEC);
		mysql_close(conn);
		exit(1);
}
