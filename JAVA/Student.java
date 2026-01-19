import java.util.Scanner;

public class Student {
    private int id;
    private String name;
    private int age;
    private String course;
    
    // Constructor
    public Student() {
    }
    
    // Constructor with parameters
    public Student(int id, String name, int age, String course) {
        this.id = id;
        this.name = name;
        this.age = age;
        this.course = course;
    }
    
    // Getters
    public int getId() {
        return id;
    }
    
    public String getName() {
        return name;
    }
    
    public int getAge() {
        return age;
    }
    
    public String getCourse() {
        return course;
    }
    
    // Setters
    public void setId(int id) {
        this.id = id;
    }
    
    public void setName(String name) {
        this.name = name;
    }
    
    public void setAge(int age) {
        this.age = age;
    }
    
    public void setCourse(String course) {
        this.course = course;
    }
    
    // Read data from user input with proper resource management
    public void readData() {
        try (Scanner sc = new Scanner(System.in)) {
            System.out.print("Enter Student ID: ");
            id = sc.nextInt();
            sc.nextLine(); 

            System.out.print("Enter Student Name: ");
            name = sc.nextLine();

            System.out.print("Enter Age: ");
            age = sc.nextInt();
            sc.nextLine(); 

            System.out.print("Enter Course: ");
            course = sc.nextLine();
        }
    }

    public void displayData() {
        System.out.println("\n--- Student Details ---");
        System.out.println("ID        : " + id);
        System.out.println("Name      : " + name);
        System.out.println("Age       : " + age);
        System.out.println("Course    : " + course);
    }
    public static void main(String[] args) {
        Student student = new Student();
        student.readData();
        student.displayData();
    }
}