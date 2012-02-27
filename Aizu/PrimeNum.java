import java.util.*;

public class PrimeNum {
	public static void main (String args[]) {
		Scanner scn = new Scanner(System.in);
		int n = scn.nextInt();
		double sqrt_n = Math.ceil(Math.sqrt(n));
		ArrayList<Integer> skip = new ArrayList<Integer>();
		ArrayList<Integer> prime_num = new ArrayList<Integer>();
		for(int i=0;i<=n;i++) { skip.add(0); }
		for(int i=3;i<=n;i+=2) { skip.set(i,1); }

		if (n%2 == 0) { prime_num.add(2); }
		for(int i=3;i<=n;i+=2) {
			if (skip.get(i) == 0) {
				continue;
			}
			for(int a=i+i;a<=n;a+=i) {
				skip.set(a,0);
			}
			prime_num.add(i);
		}
		System.out.println(prime_num.size());
	}
}
