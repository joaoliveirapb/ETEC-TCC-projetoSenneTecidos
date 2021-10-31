﻿using BLL.Useful;
using Microsoft.AspNetCore.Mvc.ModelBinding.Validation;
using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace BLL.Validations
{
    public class CPFValidationAttribute : ValidationAttribute, IClientModelValidator
    {
        public string[] ErrorMessageList = {
            "CPF Invalid",
        };

        public CPFValidationAttribute()
        { }

        protected override ValidationResult IsValid(object value, ValidationContext validationContext)
        {
            if (value != null && !string.IsNullOrEmpty(Convert.ToString(value)))
            {
                bool isValid = CPFValidator.IsCpf(value.ToString());

                if (isValid)
                {
                    return ValidationResult.Success;

                }
            }

            return GetValidationResultErrorMessage(ErrorMessage ?? ErrorMessageList[0],
                        validationContext?.DisplayName);
        }

        public void AddValidation(ClientModelValidationContext context)
        {
            if (context == null)
            {
                throw new ArgumentNullException(nameof(context));
            }
            context.Attributes.Add("data-val", "true");
            context.Attributes.Add("data-val-cpf", GetValidationClientErrorMessage(context));
        }

        private string GetValidationClientErrorMessage(ClientModelValidationContext context)
        {
            var str = (!string.IsNullOrEmpty(ErrorMessage)) ? ErrorMessage : ErrorMessageList[0];
            return string.Format(str, context.ModelMetadata?.GetDisplayName());
        }

        private ValidationResult GetValidationResultErrorMessage(string message, string param1 = "", string param2 = "")
        {
            return new ValidationResult(string.Format(message, param1, param2));
        }
    }
}