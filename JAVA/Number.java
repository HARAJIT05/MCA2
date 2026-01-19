import java.util.Scanner;

class NumberAnalysis {
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);

        System.out.print("Enter a number: ");
        int n = sc.nextInt();

        if (n > 0) System.out.println("Positive");
        else if (n < 0) System.out.println("Negative");
        else System.out.println("Zero");

        System.out.println(n % 2 == 0 ? "Even" : "Odd");
    }
}
