import java.util.Scanner;

class Debt {
	public static void main (String args[]) {
		Scanner scn = new Scanner(System.in);
		int n = scn.nextInt();
		double debt = 100000;
		for(int i=0;i<n;i++) {
			debt = debt + debt/100*5;
			debt = Math.ceil(debt/1000);
			debt = debt*1000;
		}
		System.out.println(debt);
	}
}
