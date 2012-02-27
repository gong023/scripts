import java.util.*;
class SumInteger {
	public static void main (String args[]) {
		int a,b,c,d,n,count;
		a = b = c = d = 9;
		Scanner scn = new Scanner(System.in);
		n = scn.nextInt();
		count = 0;

		for (int i=0;i<=a+b;i++) {
			if (i<=n && n<=i+c+d) {
				count += mesureLength(a+b,0,i) * mesureLength(c+d+i,i,n);
			}   
		}   
		System.out.println(count);
	}

	static int mesureLength (int max,int min,int n) {
		if ((max + min) / 2 > n) {
			return n - min + 1;
		} else {
			return max - n + 1;
		}   
	}
}
