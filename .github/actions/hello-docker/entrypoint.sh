#!/bin/sh
echo "::debug::Runnig entrypoint.sh"
echo "::warning::Starting entrypoint.sh in a minute"
echo "Hello, $@"
echo "INPUT_WHOM_TO_GREET: $INPUT_WHOM_TO_GREET"
echo "HELLO: $HELLO"
time=$(date)
echo "time=$time" >> $GITHUB_OUTPUT
echo "HELLO_TIME=$time" >> $GITHUB_ENV