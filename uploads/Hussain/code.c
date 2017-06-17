 void copyData(char *userId) {  
    char  smallBuffer[10]; // size of 10  
    strcpy(smallBuffer, userId);
 }  
 int main(int argc, char *argv[]) {  
 char *userId = "01234567890"; // Payload of 11
 copyData (userId); // this shall cause a buffer overload
 }