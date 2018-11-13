@csrf

<div class="questions" id="questionForm">

    <div class="question mb-lg-4" v-for="(question, index) in questions">
        <div class="form-group row">
            <label for="type" class="col-sm-2 col-form-label text-md-right">{{ __('Question type') }}</label>

            <div class="col-md-6">
                <select v-model="questions[index].type" class="form-control"
                        :name="`questions[${index}][type]`" required>
                    <option value="Text">
                        Text
                    </option>

                    <option value="MCSO">
                        Multiple Choice (Single Option)
                    </option>

                    <option value="MCMO">
                        Multiple Choice (Multiple Options)
                    </option>

                </select>
            </div>
        </div>

        <div class="form-group row">
            <label :for="'question-' + index"
                   class="col-sm-2 col-form-label text-md-right">{{ __('Question') }}</label>

            <div class="col-md-6">
                <input :id="'question-' + index" type="text"
                       placeholder="Enter Question"
                       class="form-control"
                       v-model="questions[index].question"
                       :name="`questions[${index}][question]`" required>
            </div>

            <div class="col-sm-2">
                <button @click.prevent="removeQuestion(index)" class="btn btn-default">Remove Question</button>
            </div>
        </div>

        <div class="form-group row" v-if="questions[index].type == 'Text'">
            <label :for="['answer', index].join('-')"
                   class="col-sm-2 col-form-label text-md-right">{{ __('Answer') }}</label>

            <div class="col-md-6">
                <input :id="'answer-' + index" type="text"
                       placeholder="Enter Answer"
                       class="form-control"
                       v-model="questions[index].answer"
                       :name="`questions[${index}][answer]`" required>
            </div>
        </div>


        <div class="form-group row"
             v-for="(choice, choice_index) in question.choices"
             v-if="question.type == 'MCSO' || question.type == 'MCMO'">
            <label :for="['choice', index, choice_index].join('-')"
                   class="col-sm-2 col-form-label text-md-right">Choice @{{ choice_index + 1 }}</label>

            <div class="col-md-6">
                <input :id="'answer-' + index" type="text"
                       placeholder="Enter Choice"
                       class="form-control"
                       v-model="question.choices[choice_index].choice"
                       :name="`questions[${index}][choices][${choice_index}][choice]`" required>
            </div>
            <div class="col-sm-2">
                <div class="form-check">
                    <input class="form-check-input"
                           :ture-value="1"
                           :false-value="0"
                           type="checkbox"
                           :name="`questions[${index}][choices][${choice_index}][is_correct]`"
                           v-model="question.choices[choice_index].is_correct">
                    <label class="form-check-label" for="defaultCheck2">
                        Correct?
                    </label>
                </div>
            </div>

            <div class="col-sm-2">
                <button @click.prevent="removeChoice(index, choice_index)" class="btn btn-default">
                    Remove Choice
                </button>
            </div>
        </div>


        <div class="form-group row">
            <div class="col-md-10 offset-md-2">
                <button v-if="questions[index].type == 'MCSO' || questions[index].type == 'MCMO'"
                        @click.prevent="addChoice(index)"
                        class="btn btn-primary"
                >
                    +Add Choice
                </button>
            </div>
        </div>

    </div>

    <div class="form-group row">
        <div class="col-md-10 offset-md-2">
            <button class="btn btn-primary" @click.prevent="addQuestion">+ Add Question</button>
        </div>
    </div>


    <div class="form-group row mb-0">
        <div class="col-md-10 offset-md-2">
            <button type="submit" class="btn btn-primary">
                {{ __('Save') }}
            </button>
        </div>
    </div>