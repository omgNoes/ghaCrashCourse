const core = require("@actions/core");
const github = require("@actions/github");

try {
  core.debug("Debug message");
  core.warning("Warning message");
  core.error("Error message");
  core.setSecret("Foo");

  const name = core.getInput("whom_to_greet");

  console.log(`Hello, ${name}`);

  const time = new Date();
  core.setOutput("time", time.toTimeString());

  if (time.getMinutes % 2 == 0) {
    throw new Error("Some annoying error message");
  }
  core.exportVariable("HELLO_TIME", time);

  core.startGroup("Logging github context");
  console.log(JSON.stringify(github.context, null, 2));
  core.endGroup();
} catch (error) {
  core.setFailed(error.message);
}
