import java.util.*;

class GCD {
	public static void main (String args[])	{
		Scanner scn = new Scanner(System.in);
		int a = scn.nextInt();
		int b = scn.nextInt();
		int i = 0;
		ArrayList<Integer> gcd = new ArrayList<Integer>();
		while (i>=0) {
			if (i==0) {
				gcd.add(a % b);
			} else if (i==1) {
				gcd.add(b % gcd.get(i-1));
			} else {
				gcd.add(gcd.get(i-2) % gcd.get(i-1));
			}
			if (gcd.get(i)==0) {
				System.out.println("GCD=" + gcd.get(i-1));
				int lcm = a * b / gcd.get(i-1);
				System.out.println("LCM=" + lcm);
				break;
			}
			i++;	
		}
	}
}
