import numpy as np
arr1=np.array([[1, 2, 3], [4, 5, 6], [7, 8, 9]])
arr2=np.array([[9, 8, 7], [6, 5, 4], [3, 2, 1]])
sum_arr = np.add(arr1, arr2)
devide = np.subtract(arr1, arr2)
multiply = np.multiply(arr1, arr2)
print("Sum of Arrays:\n", sum_arr)
print("Difference of Arrays:\n", devide)
print("Product of Arrays:\n", multiply)