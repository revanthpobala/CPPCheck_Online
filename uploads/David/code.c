void copyData(char *userId) {
   char  smallBuffer[10]; // size of 10
   strncpy(smallBuffer, userId, 10); // only copy first 10 elements
   smallBuffer[9] = 0; // Make sure it is terminated.
}

int main(int argc, char *argv[]) {
   char *userId = "01234567890"; // Payload of 11
   copyData (userId); // this shall cause a buffer overload
}