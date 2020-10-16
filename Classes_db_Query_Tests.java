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
}
