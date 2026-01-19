#include <stdio.h>
int main() {
    int i ,n;   
    printf("Enter the size of array: ");
    scanf("%d",&n);
    int arr[n];
    printf("Enter %d elements in array: ",n);
    for(i=0;i<n;i++){
        scanf("%d",&arr[i]);
    }
    printf("The elements in array are: ");
    for(i=0;i<n;i++){
        printf("%d ",arr[i]);
    }
    return 0;
}