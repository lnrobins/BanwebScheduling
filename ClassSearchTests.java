import static org.junit.jupiter.api.Assertions.*;

import org.junit.jupiter.api.AfterEach;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;

class ClassSearchTests {
	
	ClassSearch classSearch = null;
	
	@BeforeEach
	void setUp() throws Exception {
		classSearch = new ClassSearch();
	}

	@Test
	void courseTest1() {
		String course = classSearch.search(85031);
		int expected = 1100;
		if (Integer.parseInt(course) != expected) {
			fail("course does not equal expected value");
		}
		
	}
	
	@Test
	void courseTest2() {
		String course = classSearch.search(83148);
		int expected = 5755;
		if (Integer.parseInt(course) != expected) {
			fail("course does not equal expected value");
		}
	}
	
	@Test
	void fakeCourse1() {
		String course = classSearch.search(232523);
		if (!course.equals("No such course exists") ) {
			fail("This course is not supposed to exist");
		}
	}
	
	@Test
	void fakeCourse2() {
		String course = classSearch.search(-1234);
		if (!course.equals("No such course exists") ) {
			fail("This course is not supposed to exist");
		}
	}

}
