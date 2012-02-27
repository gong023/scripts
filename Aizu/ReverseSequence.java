import java.io.*;
import java.util.*;

class ReverseSequence {
	public static void main (String args[]) throws java.io.IOException {
		BufferedReader in = new BufferedReader(new InputStreamReader(System.in));
		String input= in.readLine();
		ArrayList<Character> output = new ArrayList<Character>();
		for(int i=input.length()-1;i>=0;i--) {
			output.add(input.charAt(i));
		}
		System.out.println(output);
	}
}
