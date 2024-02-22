import java.util.Scanner;

public class SimpleChatBot {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        System.out.println("Hello! I am a simple chat bot. What's your name?");
        String name = scanner.nextLine();
        System.out.println("Nice to meet you, " + name + "! How can I assist you today?");
        
        while (true) {
            String userInput = scanner.nextLine().toLowerCase();
            
            if (userInput.contains("hello") || userInput.contains("hi")) {
                System.out.println("Hi there! How can I help?");
            } else if (userInput.contains("how are you")) {
                System.out.println("I'm just a bot, so I'm always doing well! How about you?");
            } else if (userInput.contains("bye")) {
                System.out.println("Goodbye! Have a great day, " + name + "!");
                break;
            } else {
                System.out.println("Sorry, I didn't understand that. Can you please rephrase?");
            }
        }
        
        scanner.close();
    }
}
