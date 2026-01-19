#include <stdio.h>
int main(){
    int i, n, pos, val;
    printf("Enter the size of array: ");
    scanf("%d",&n);
    int arr[n+1];
    printf("Enter %d elements in array: ",n);
    for(i=0;i<n;i++){
        scanf("%d",&arr[i]);
    }
    printf("Enter the position to insert element: ");
    scanf("%d",&pos);
    printf("Enter the value to insert: ");
    scanf("%d",&val);
    for(i=n;i>=pos;i--){
        arr[i]=arr[i-1];
    }
    arr[pos-1]=val;
    printf("The elements in array after insertion are: ");
    for(i=0;i<=n;i++){
        printf("%d ",arr[i]);
    }
    return 0;
}