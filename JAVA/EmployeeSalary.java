import java.util.Scanner;

class EmployeeSalary {

    static double hra(double b) { return b * 0.20; }
    static double da(double b)  { return b * 0.10; }
    static double pf(double b)  { return b * 0.08; }

    static double netSalary(double b) {
        return b + hra(b) + da(b) - pf(b);
    }

    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);

        System.out.print("Enter Basic Salary: ");
        double basic = sc.nextDouble();

        System.out.println("Net Salary: " + netSalary(basic));
    }
}