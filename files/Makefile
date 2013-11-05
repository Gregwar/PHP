# Makefile managing zipping files

SOURCES_DIR := sources

SOURCES := $(wildcard $(SOURCES_DIR)/*)
TARGETS := $(addsuffix .zip,$(patsubst $(SOURCES_DIR)/%,%,$(SOURCES)))

all: $(TARGETS)

%.zip: $(SOURCES_DIR)/%
	./zip.sh $< $@

clean:
	@echo "Cleaning..."
	@rm -rf *.zip
