# Makefile managing zipping files

SOURCES_DIR := sources

SOURCES := $(wildcard $(SOURCES_DIR)/*)
TARGETS := $(addsuffix .zip,$(patsubst $(SOURCES_DIR)/%,%,$(SOURCES)))

all: $(TARGETS)

%.zip: $(SOURCES_DIR)/%
	@rm -f $@
	@echo "Zipping $< to $@..."
	@zip -r $@ $< > /dev/null

clean:
	@echo "Cleaning..."
	@rm -rf *.zip
