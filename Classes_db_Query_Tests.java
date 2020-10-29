package sqlite;

import static org.junit.jupiter.api.Assertions.*;

import org.junit.jupiter.api.Test;

class Classes_db_Query_Tests {

	@Test
	void courseTest1() {
		int course = Classes_db_Query.query(85031);
		int expected = 1100;
		if ( course != expected ) {
			fail("course does not equal expected value");
		}
	}
	
	@Test
	void courseTest2() {
		int course = Classes_db_Query.query(84237);
		int expected = 1111;
		if ( course != expected ) {
			fail("course does not equal expected value");
		}
	}

	@Test
	void fakeCourse1() {
		int course = Classes_db_Query.query(23434);
		int expected = 0;
		if ( course != expected ) {
			fail("course does not equal expected value");
		}
	}
	
	@Test
	void fakeCourse2() {
		int course = Classes_db_Query.query(90823);
		int expected = 0;
		if ( course != expected ) {
			fail("course does not equal expected value");
		}
	}
	
	@Test
	void queryTest1() {
		int course = (int) Classes_db_Query.query("select* from classes where subject = 'EE' order by CRN asc")[0];
		int expected = 80078;
		if (course != expected ) {
			fail("course does not equal expected value");
		}
	}
	
	@Test
	void queryTest2() {
		Object[] courses = Classes_db_Query.query("select* from classes where subject = 'CS' order by CRN desc limit 3");
		Object[] expected = new Integer[] { 85084, 84725, 84724 };
		boolean equal = true;
		for(int i = 0; i < 3; i++) {
			if (courses[i] != expected[i]) {
				equal = false;
			}
		}
		if ( equal ) {
			fail("courses do not match expected value");
		}
	}
	
	@Test
	void queryTestFakeCourse() {
		int course = (int) Classes_db_Query.query("select* from classes where CRN = 1234567")[0];
		int expected = 0;
		if (course != expected ) {
			fail("course does not equal expected value");
		}
	}
}
