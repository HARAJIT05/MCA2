import pandas as pd
import matplotlib.pyplot as plt
import numpy as np
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LinearRegression
from sklearn.metrics import mean_squared_error, r2_score
from sklearn.preprocessing import StandardScaler
file_path = '/home/kazuha/Documents/MCA/ML/Linear Regression/Housing.csv'
df = pd.read_csv(file_path)
binary_vars = ['mainroad', 'guestroom', 'basement', 'hotwaterheating', 'airconditioning', 'prefarea']
for var in binary_vars:
    df[var] = df[var].astype(str).str.strip().map({'yes': 1, 'no': 0})
    if df[var].isnull().any():
        print(f"Warning: NaN values found in {var}, dropping rows.")
        df.dropna(subset=[var], inplace=True)
feature_cols = ['area', 'bedrooms', 'bathrooms', 'stories', 'parking'] + binary_vars
X = df[feature_cols]
Y = df['price']
X_train, X_test, Y_train, Y_test = train_test_split(X, Y, test_size=0.2, random_state=42)
scaler = StandardScaler()
X_train_scaled = scaler.fit_transform(X_train)
X_test_scaled = scaler.transform(X_test)
model = LinearRegression()
model.fit(X_train_scaled, Y_train)
Y_pred = model.predict(X_test_scaled)
mse = mean_squared_error(Y_test, Y_pred)
r2 = r2_score(Y_test, Y_pred)
print(f"Model Optimized with {len(feature_cols)} features.")
print(f"Features: {', '.join(feature_cols)}")
print(f"Mean Squared Error: {mse:.2f}")
print(f"R2 Score: {r2:.4f}")
plt.figure(figsize=(10, 6))
plt.scatter(Y_test, Y_pred, color='blue', alpha=0.6)
plt.plot([Y_test.min(), Y_test.max()], [Y_test.min(), Y_test.max()], 'r--', lw=2, label='Ideal Fit')
plt.xlabel('Actual Price')
plt.ylabel('Predicted Price')
plt.title('Actual vs Predicted Prices (Multiple Linear Regression)')
plt.legend()
plt.grid(True)
plt.savefig('housing_price_plot_optimized.png')
print("Optimized plot saved to housing_price_plot_optimized.png")
print("\n--- Predict Price with Optimized Model ---")
print("Please enter the following details:")
try:
    input_data = []
    for col in ['area', 'bedrooms', 'bathrooms', 'stories', 'parking']:
        val = float(input(f"{col.capitalize()}: "))
        input_data.append(val)
    for col in binary_vars:
        while True:
            val = input(f"{col.capitalize()} (yes/no): ").strip().lower()
            if val in ['yes', 'no']:
                input_data.append(1 if val == 'yes' else 0)
                break
            print("Invalid input. Type 'yes' or 'no'.")
    input_array = np.array([input_data])
    input_scaled = scaler.transform(input_array)
    predicted_price = model.predict(input_scaled)
    print(f"\nPredicted Price: {predicted_price[0]:,.2f}")
except ValueError:
    print("\nInvalid numeric input. Prediction aborted.")
except Exception as e:
    print(f"\nAn error occurred: {e}")