import java.util.Scanner;

class Studentm {
    String name;
    int rollNumber;
    String course;
    float marks;

    void readData(Scanner sc) {
        System.out.print("Enter Student Name: ");
        name = sc.nextLine();

        System.out.print("Enter Roll Number: ");
        rollNumber = sc.nextInt();
        sc.nextLine();

        System.out.print("Enter Course: ");
        course = sc.nextLine();

        System.out.print("Enter Marks: ");
        marks = sc.nextFloat();
    }

    void displayData() {
        System.out.println("\n===== Student Information =====");
        System.out.println("Name        : " + name);
        System.out.println("Roll Number : " + rollNumber);
        System.out.println("Course      : " + course);
        System.out.println("Marks       : " + marks);
        System.out.println("================================");
    }

    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        Studentm student = new Studentm();

        student.readData(sc);
        student.displayData();

        sc.close();
    }
}
