#include <stdio.h>
int main (){
    int i , n, pos;
    printf("Enter the size of array: ");
    scanf("%d",&n);
    int arr[n];
    printf("Enter %d elements in array: ",n);
    for(i=0;i<n;i++){
        scanf("%d",&arr[i]);
    }
    printf ("Enter the position to delete element: ");
    scanf ("%d",&pos);
    for(i=pos-1;i<n-1;i++){
        arr[i]=arr[i+1];
    }
    n--;
    printf("The elements in array after deletion are: ");
    for(i=0;i<n;i++){
        printf("%d ",arr[i]);
    }
    return 0;
}